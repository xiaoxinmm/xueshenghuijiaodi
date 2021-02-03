import pandas as pd
import time
def geturl(url):

    #url='http://192.168.0.7:8000/admin/tabolt.php'

    df=pd.read_html(url,encoding = "utf8")[1]

    print('获取成功进行下一步，生成excel表格')
    # [0]：表示第一个table，多个table需要指定，如果不指定默认第一个

    # 如果没有【0】，输入dataframe格式组成的list
    dummy_gettime = time.strftime("%Y-%m-%d %H:%M:%S", time.localtime()) 
    #print(type(df))
    df.to_csv('生成时间'+dummy_gettime+'.xlsx',mode='a', encoding='utf_8_sig', header=1, index=0)
    print(dummy_gettime+'生成文件在目录下请自行查看')