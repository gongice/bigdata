*2017/09/28 星期四 15:28:00*

----------
## 问题描述 ##

服务端最近有很多请求超时，查看日志发现每隔5分钟就会有超时高峰，这个时间与我们业务中每五分钟从缓存（redis）同步数据的时间基本吻合。

## 开始排查原因 ##

- 用`iftop` 工具查看两端服务器的流量情况：

      流量高峰也是五分钟左右，很可能IO阻塞了，所以优化对缓存的读写，超时减少了

- 但是发现超时情况还是有五分钟的间隔高峰（比之前好很多了），用 `SLOWLOG GET`查看Redis的慢日志

      阻塞的都是DEL命令
      之前只考虑读、写会阻塞，没想到删除KEY也会造成阻塞
      原来del对于string和hash的时间复杂度是O(1)，但是对于list,set,sorted set等居然是O(N)的

## 总结建议 ##
      针对Redis 这种删除集合阻塞的情况可以用伪删除的方式来代替：
      1、rename key new_key
      2、expire key short_time
