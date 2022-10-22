from pymongo import MongoClient
import certifi

# Replace the uri string with your MongoDB deployment's connection string.
uri = "mongodb+srv://gtpkt:donaldrice69@cluster0.te4ub7y.mongodb.net/test"

client = MongoClient(uri, tlsCAFile=certifi.where())
db = client.courseEquivalencies
coll = db.courses 

docs = [
    {"gtcourse" : "MATH 1554", "gtname" : "Linear Algebra", "utransfer" : "Ball State University", "transfercourse" : "Math 217"},
]
result = coll.insert_many(docs)
# database and collection code goes here
# insert code goes here
# display the results of your operation
# Close the connection to MongoDB when you're done.
client.close()