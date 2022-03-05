import random
import pandas as pd


df = pd.read_json('http://localhost:3000/patients')


    
#     for number in range(0,27):
#         rand_cc = str(number)+"-"+str(number)
#         df["ccc_number"].replace({row['ccc_number']: rand_cc}, inplace=True)
#         # pass
        
#         js = df.to_json(orient = 'records')
    
    
# print(df)

import random

for i in range(50):
    randlist = random.randint(10000, 90000)
    randlist2 = random.randint(20000, 70000)
    
    print(str(randlist)+"-"+str(randlist2))
    for item in df["ccc_number"]:
        df["ccc_number"] = str(randlist)+"-"+str(randlist2)
        i=i+1
print(df)
        