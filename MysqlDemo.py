import PyMySQL
def mysqlInsert( name, text, createdTime):
    
    db = PyMySQL.connect("localhost","user","pass","tww" )
   # prepare a cursor object using cursor() method
   cursor = db.cursor()
    # execute SQL query using execute() method.
    insertQueryStr = "insert into <users> (<Column names>) values ('" +navya+"','"+url+"','"+ 10:20 +"'  )" 
    cursor.execute(insertQueryStr)
    # Fetch a single row using fetchone() method.
   #data = cursor.fetchone()
   print ("Database query : "+ insertQueryStr)
   # disconnect from server
   db.close() 