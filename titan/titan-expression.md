```shell
gremlin> :> g.V().hasLabel('assets').order().by('identifier',incr).limit(20)
==>v[190927056]
==>v[95117312]
==>v[93974528]
==>v[93143048]
==>v[91967496]
==>v[189665496]
==>v[183836880]
==>v[95350792]
==>v[191094992]
==>v[93368488]
==>v[95334408]
==>v[190329048]
==>v[94429192]
==>v[93184096]
==>v[187678928]
==>v[189636824]
==>v[94056448]
==>v[93204560]
==>v[91971592]
==>v[93782024]
gremlin> :> g.V().hasLabel('assets').order().by('identifier',incr).range(1,3)
==>v[95117312]
==>v[93974528]

gremlin> :> g.V().hasLabel('assets').order().by('identifier',decr).limit(20)
==>v[186937552]
==>v[93376608]
==>v[93040640]
==>v[93036544]
==>v[186761432]
==>v[93032448]
==>v[186941648]
==>v[185729240]
==>v[94908416]
==>v[93147216]
==>v[93106344]
==>v[190128344]
==>v[95039656]
==>v[94859272]
==>v[190009560]
==>v[94875648]
==>v[185913552]
==>v[93642760]
==>v[93601944]
==>v[93257808]
gremlin> :> g.V().hasLabel('assets').order().by('identifier',decr).range(1,3)
==>v[93376608]
==>v[93040640]

gremlin> :> g.V().hasLabel('assets').order().by('identifier',decr).order().by('title',incr).limit(20)
==>v[183816400]
==>v[91955208]
==>v[183759064]
==>v[92049560]
==>v[91963400]
==>v[91549696]
==>v[183824592]
==>v[92053656]
==>v[183775448]
==>v[184209616]
==>v[184983760]
==>v[92733608]
==>v[185450704]
==>v[92700840]
==>v[92663816]
==>v[183636184]
==>v[92549128]
==>v[185688280]
==>v[92676104]
==>v[184889560]
gremlin> :> g.V().hasLabel('assets').order().by('identifier',decr).limit(20).order().by('title',incr)
==>v[185729240]
==>v[93147216]
==>v[93106344]
==>v[185913552]
==>v[190128344]
==>v[95039656]
==>v[94875648]
==>v[190009560]
==>v[94908416]
==>v[94859272]
==>v[93642760]
==>v[93601944]
==>v[93257808]
==>v[186937552]
==>v[93376608]
==>v[93040640]
==>v[93036544]
==>v[186761432]
==>v[93032448]
==>v[186941648]

```

## range(begin,end)
表示结果集中从第'from'条开始取，取'end-begin'条
