from flask import Flask, jsonify, request, render_template
import requests

app = Flask(__name__)

APIKEY = 'DNA5GFSL1KVV5QCV'
BASEURL = 'https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol={symbol}&interval=1min&apikey={API_KEY}'


@app.route('/api/stock/<symbol>', methods=['GET'])
def getstockdata(symbol):
    url = f'https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol={symbol}&interval=5min&apikey={APIKEY}'
    response = requests.get(url)
    data = response.json()

    try:
        time_series = data['Time Series (5min)']
        result = [{'time': time, 'open': float(details['1. open']),
                   'high': float(details['2. high']),
                   'low': float(details['3. low']),
                   'close': float(details['4. close'])}
                  for time, details in time_series.items()]
        return jsonify(result)
    except KeyError:
        return jsonify({'error': 'Error fetching data'}), 500

@app.route('/candlestick/<symbol>')
def candlestick(symbol):
    return render_template('candlestick.html', symbol=symbol)

@app.route('/', methods=['GET','POST'])
def check():
    return "Application is running"


if __name__ == '__main__':
    app.run(debug=True)
