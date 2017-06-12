#!/usr/bin/python
#GpioForLight.py	
# - control GPIO using command 
# - argv:PIN NUMBER , action cmd(on,off,flash)
import RPi.GPIO as GPIO
import time
import sys




class GpioForLights:
	def __init__(self,PinNum,Alert=0):
		#initialization :set output pin
		self.ledPin = int(PinNum)
		GPIO.setmode(GPIO.BOARD)
		GPIO.setup(self.ledPin, GPIO.OUT)
		GPIO.setwarnings(False)
		#initialization : Alert
		self.AlertOn = Alert

		#initialization : Pin off
		self.off()

		#alert text	
		
		if self.AlertOn:
			print "Setup Pin "+str(self.ledPin)+" is OutPut..."


	def on(self):		
  		GPIO.output(self.ledPin, False)

		#alert text
		if self.AlertOn:
			print "Set Output On"
	def off(self):		
  		GPIO.output(self.ledPin, True)

		#alert text
		if self.AlertOn:
			print "Set Output Off"
	
	def flash(self,rtime=3,SleepTime=1):
		print str(self.ledPin)+" Pin Starting flash... "
		for i in range(rtime):

		  print "Set Output True"
		  GPIO.output(self.ledPin, False)
		  time.sleep(SleepTime)

		  print "Set Output False"
		  GPIO.output(self.ledPin, True)
		  time.sleep(SleepTime)

		#alert text
		if self.AlertOn:
			print "Set Output Off"

#main program
pin = GpioForLights(sys.argv[1],1)


if sys.argv[2] == "off":
	pin.off()
elif sys.argv[2] == "on":
	pin.on()
elif sys.argv[2] == "flash":
	pin.flash()
else:
	print "not Found Command"
