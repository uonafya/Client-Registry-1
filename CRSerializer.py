import requests

def client():
    
    response = requests.get('http://localhost:3000/patients');
    
    print('Status Code:', response.status_code)
    response_data = response.json()
    print(response_data)
    
if __name__ == "__main__":
    client()