import requests as rq

r = rq.post("http://140.130.36.51/HelloGPIO/index.php",data={"Act":"addDevice","Pin_id":"14","Cost":"100","Name":"light"})
#r = rq.post("http://140.130.36.51/HelloGPIO/index.php",data={"Act":"addUser","User_id":"4024xxxx","Mail":"4024xxxx@gm.nfu.edu.tw","Name":"P.K"})
#r = rq.post("http://140.130.36.51/HelloGPIO/index.php",data={"Act":"CMD","Pin_id":"14","User_id":"4024xxxx","CMD":"on"})
print r.status_code
print r.text
