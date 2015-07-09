# cassa-yaku
cassandraで動作するtwitterライクなwebアプリ。  
思う存分ささやいてください。

# H1 使い方
フォームに適当に書いてささやくボタンを押すと、ささやきとなってタイムラインに書き込まれます。

# H1 webサービスAPI
# H2 読み込みAPI
http://133.50.18.13/cassa-yaku/api/get?user="◯◯◯"
# H2 書き込みAPI
http://133.50.18.13/cassa-yaku/api/post?user="◯◯◯"&content="✕✕✕"

# H1 注意事項
現在はcassandraではなくmongoDBに移行。  
mongoDBが動作しているサーバーで動作します。
