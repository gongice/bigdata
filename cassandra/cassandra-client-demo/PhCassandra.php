<?php
$GLOBALS['THRIFT_ROOT'] = '/usr/share/php/Thrift';
require_once $GLOBALS['THRIFT_ROOT'].'/packages/cassandra/Cassandra.php';
require_once $GLOBALS['THRIFT_ROOT'].'/packages/cassandra/cassandra_types.php';
require_once $GLOBALS['THRIFT_ROOT'].'/transport/TSocket.php';
require_once $GLOBALS['THRIFT_ROOT'].'/protocol/TBinaryProtocol.php';
require_once $GLOBALS['THRIFT_ROOT'].'/transport/TFramedTransport.php';
require_once $GLOBALS['THRIFT_ROOT'].'/transport/TBufferedTransport.php';

try {
  // ����Cassandra����
  $socket = new TSocket('192.168.10.2', 9160);
  $transport = new TBufferedTransport($socket, 1024, 1024);
  $protocol = new TBinaryProtocolAccelerated($transport);
  $client = new CassandraClient($protocol);
  $transport->open();

  $keyspace = 'Keyspace1';
  $keyUser = "studentA";

  $columnPath = new cassandra_ColumnPath();
  $columnPath->column_family = 'Standard1';
  $columnPath->super_column = null;
  $columnPath->column = 'age';
  $consistency_level = cassandra_ConsistencyLevel::ZERO;
  $timestamp = time();
  $value = "18";
  // д������
  $client->insert($keyspace, $keyUser, $columnPath, $value, $timestamp, $consistency_level);

  $columnParent = new cassandra_ColumnParent();
  $columnParent->column_family = "Standard1";
  $columnParent->super_column = NULL;

  $sliceRange = new cassandra_SliceRange();
  $sliceRange->start = "";
  $sliceRange->finish = "";
  $predicate = new cassandra_SlicePredicate();
  list() = $predicate->column_names;
  $predicate->slice_range = $sliceRange;

  $consistency_level = cassandra_ConsistencyLevel::ONE;
  $keyUser = studentA;
  // ��ѯ����
  $result = $client->get_slice($keyspace, $keyUser, $columnParent, $predicate, $consistency_level);

  print_r($result);
  // �ر�����
  $transport->close();
} catch (TException $tx) {
   print 'TException: '.$tx->why. ' Error: '.$tx->getMessage() . "\n";
}
?>
