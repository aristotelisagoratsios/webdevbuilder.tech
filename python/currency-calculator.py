#! /usr/bin/python

print 'Content-type:text/html'
print ''
 


print '<h1 style="font-size:30px; padding-left:15px">Currency Calculator</h1>'


# Registration Form section 
print '<form method="post" style="width:220px; height:330px; padding:10px 0px 0px 4px" border-radius:15px; text-transform:uppercase; font-size:11px; font-weight:bold; font-family:"Century Gothic"; color:white; background-color:black;">'
print '<h2 style="font-size:20px; padding-left:15px">Your email</h2>'
print '<input style="height:32px; width:150px; font-size:20px; margin-left:15px" type="text">'
print '<p style="padding-left:15px">This email exists already in the database</p>'
print '<h2 style="font-size:20px; padding-left:15px">Password</h2>'
print '<input style="height:32px; width:150px; font-size:20px; margin-left:15px" type="text">'
print '<p style="padding-left:15px">At least 8 characters</p>'    
print '<h2 style="font-size:20px; padding-left:15px">Password(Repeat)</h2>'
print '<input style="height:32px; width:150px; font-size:20px; margin-left:15px" type="text">'
print '<p style="padding-left:15px">Write again your password</p>'
print '<input style="height:40px; background-color:lightblue; margin-left:15px; width:200px; font-size:20px" type="submit" value="Register">'
print '</form>'
print '<br></br><br></br><br></br><br></br><br></br><br></br>'



# Currency Calculator section 
print '<form method="post">'
print '<h2 style="font-size:20px; padding-left:15px">Enter Amount</h2>'
print '<input style="height:40px; width:150px; font-size:20px; margin-left:15px" type="text" value="1">'
print '<br></br>'
print '<h2 style="font-size:20px; padding-left:15px">From</h2>'
print '<select style="height:32px; font-size:15px; margin-left:15px">'
print '<option value="USD" style="height:30px; font-size:15px; margin-left:15px; padding-top:5px" >US Dollar</option>'
print '<option style="height:28px;  font-size:15px; margin-left:15px; padding-top:5px" value="EUR">Euro</option>'
print '<option style="height:30px; font-size:15px; margin-left:15px; padding-top:5px" value="JPY">Japanese Yen</option>'
print '<option style="height:30px; font-size:15px; margin-left:15px; padding-top:5px" value="GBP">British Pound Sterling</option>'
print '<option style="height:30px; font-size:15px; margin-left:15px; padding-top:5px" value="CAD">Canadian Dollar</option>'
print '<option style="height:30px; font-size:15px; margin-left:15px; padding-top:5px" value="CHF">Swiss Franc</option>'
print '<option style="height:30px; font-size:15px; margin-left:15px; padding-top:5px" value="CNY">Chinese Yuan</option>'
print '<option style="height:30px; font-size:15px; margin-left:15px; padding-top:5px" value="NZD">New Zealand Dollar</option>'
print '<option style="height:30px; font-size:15px; margin-left:15px; padding-top:5px" value="HKD">Hong Kong Dollar</option>'
print '<option style="height:30px; font-size:15px; margin-left:15px; padding-top:5px" value="AUD">Australian Dollar</option>'
print '</select>'
print '<span style="font-size:28px; padding-left:20px">&#8646;</span>'
print '<h2 style="font-size:20px; float:left; position:absolute; padding-left:258px; margin-top:-83px">To</h2>'
print '<select style="height:32px;  font-size:15px; margin-left:20px; margin-top:10px">'
print '<option style="height:28px;  font-size:15px; margin-left:15px; padding-top:5px" value="EUR">Euro</option>'
print '<option style="height:30px; font-size:15px; margin-left:15px; padding-top:5px" value="JPY">Japanese Yen</option>'
print '<option style="height:30px; font-size:15px; margin-left:15px; padding-top:5px" value="GBP">British Pound Sterling</option>'
print '<option style="height:30px; font-size:15px; margin-left:15px; padding-top:5px" value="AUD">Australian Dollar</option>'
print '<option style="height:30px; font-size:15px; margin-left:15px; padding-top:5px" value="CAD">Canadian Dollar</option>'
print '<option style="height:30px; font-size:15px; margin-left:15px; padding-top:5px" value="CHF">Swiss Franc</option>'
print '<option style="height:30px; font-size:15px; margin-left:15px; padding-top:5px" value="CNY">Chinese Yuan</option>'
print '<option style="height:30px; font-size:15px; margin-left:15px; padding-top:5px" value="NZD">New Zealand Dollar</option>'
print '<option style="height:30px; font-size:15px; margin-left:15px; padding-top:5px" value="HKD">Hong Kong Dollar</option>'
print '<option value="USD" style="height:30px; font-size:15px; margin-left:15px; padding-top:5px" >US Dollar</option>'
print '</select>'
print '</form>'
print '<br>'
print '<p style="padding-left:17px; font-weight:bold">1 EUR = ....</p>'
print '<input style="height:40px; background-color:lightblue; margin-left:15px; width:200px; font-size:20px" type="submit" value="Get Exchange Rate">'
 
import requests
import getpass
import json
import argparse
import mysql.connector
import jwt
from flask import Flask, request
from datetime import date
import time 



#Connecting to the Database

connectiondb = mysql.connector.connect(host="sdb-r.hosting.stackcp.net",user="python-323036276e",passwd="2[hg6cQfFw3a",database="python-323036276e")
cursordb = connectiondb.cursor()



#Register and Login System

if myRL == "Register":
    User = input("Username:") 
    PW = input("Password:")
    PW1 = input("Confirm Password:")

    if(PW == PW1):
        print("Registration successfully.")
        
        with open('phpMyAdmin-config-phpmyadmin.stackcp.com.json', 'a') as f:      
                f.write("\n" + User + "," + PW)
                
    else:
        print("Registration failed! Please confirm your Password correctly.") 

if myRL == "Login":
    User = input("Username:") 
    PW = input("Password:")
    success = False
    with open('phpMyAdmin-config-phpmyadmin.stackcp.com.json', 'r') as f: 
        for i in f:
            a,b = i.split(",")
            b = b.strip()
            a = a.strip()
            if(a==User and b==PW):
                print("Login successful")
            else:
                print("Login failed. Wrong Username or Password.")     
            f.close() 
            break
            
myRL = input("Login or Register?")




#Calling an API secured with a JSON Web Token

flask_app = Flask(__name__)

SECRET_KEY = "hkBxrbZ9Td4QEwgRewV6gZSVH4q78vBia4GBYuqd09SsiMsIjH"

def token_required(something):
    def wrap():
        try:
            token_passed = request.headers['TOKEN']
            if request.headers['TOKEN'] != '' and request.headers['TOKEN'] != None:
                try:
                    data = jwt.decode(token_passed,SECRET_KEY, algorithms=['HS256'])
                    return something()
                except jwt.exceptions.ExpiredSignatureError:
                    return_data = {
                        "error": "1",
                        "message": "Token has expired"
                        }
                    return flask_app.response_class(response=json.dumps(return_data), mimetype='application/json'),401
                except:
                    return_data = {
                        "error": "1",
                        "message": "Invalid Token"
                    }
                    return flask_app.response_class(response=json.dumps(return_data), mimetype='application/json'),401
            else:
                return_data = {
                    "error" : "2",
                    "message" : "Token required",
                }
                return flask_app.response_class(response=json.dumps(return_data), mimetype='application/json'),401
        except Exception as e:
            return_data = {
                "error" : "3",
                "message" : "An error occured"
                }
            return flask_app.response_class(response=json.dumps(return_data), mimetype='application/json'),500

    return wrap



            
#Currency Converter System

api_url_end='https://freecurrencyapi.net/api/v2/latest?apikey=ccc0b100-8a55-11ec-8276-b71d1ddd6a9b'
def currency_convertor(currency_from,currency_to,amount):
    rate=response.json()['rates'][currency_from]
    amount_in_EUR=amount/rate
    result=amount_in_EUR*(response.json()['rates'][currency_to])
    print(result)
    
response=requests.get(api_url_end)
base_currency=input('Enter the base currency from '+str(response.json()['rates'].keys()))
convert_to=input('Enter the result currency '+str(response.json()['rates'].keys()))
amount_to_convert=int(input("Enter the amount to convert"))
currency_convertor(base_currency,convert_to,amount_to_convert)