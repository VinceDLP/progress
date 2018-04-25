import tushare as ts  
d = ts.get_tick_data('601069',date='2017-06-3')  
print (d)  
e = ts.get_hist_data('601069',start='2015-06-1',end='2017-06-3')  
print (e)
