import requests as rq
r = rq.post("http://......",data={"action":"InsertSql","PeopleNum":PeopleNum,"Time":RightNowShame})
print r.status_code,r.reason
