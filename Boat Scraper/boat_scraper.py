import pandas as pd
import requests

frames = pd.DataFrame()
missing_urls = []
missing_table = []

for i in urlist:
    try:
        page = requests.get(i)
        table_list = pd.read_html(page.content,header=0)
        df = table_list[0]
        if type(df) == str:
            missing_table.append(df)
        else:
            df['url'] = i
            df.to_csv('boats_database.csv',index=False,mode='a')
            frames = frames.append(df)
    except:
        missing_urls.append(i)

# Appends to a currently existing csv file
frames.to_csv('boats_database.csv',index=False,mode='a')
pd.DataFrame(missing_urls).to_csv('missing_urls.csv',index=False)