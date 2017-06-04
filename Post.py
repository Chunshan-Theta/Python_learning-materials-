import requests as rq
r = rq.post("http://"+HostIP+"/pi/SQLAPI.php",data={"action":"InsertSql","PeopleNum":PeopleNum,"Time":RightNowShame})
