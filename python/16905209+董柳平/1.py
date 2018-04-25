import tushare as ts

df = ts.get_hist_data('000875')

df.to_excel(r'd:/Python/000875.xlsx')



