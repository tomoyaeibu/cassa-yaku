# cassa-yaku
cassandraで動作するtwitterライクなwebアプリ。  
思う存分ささやいてください。

### 使い方
フォームに適当に書いてささやくボタンを押すと、  
ささやきとなってタイムラインに書き込まれます。
  
(ユーザー名[nozokimi]でログインすると全てのささやきを見ることができます。)　　

### webサービスAPI
【読み込みAPI】  
〜/cassa-yaku/api/get?user="USER"  
【書き込みAPI】  
〜/cassa-yaku/api/post?user="USER"&content="CONTENT"  

### 注意事項
現在はcassandraではなくMongoDBに移行。  
MongoDBが動作しているサーバーで動作します。
