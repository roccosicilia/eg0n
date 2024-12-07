from django.shortcuts import render

# Create your views here.

def home(request):
    return render(request, "home.html")

''' COMMENTO dopo aver inserito il rendering in urls.py
def vulns_list(request):
    return render(request, "vulns_list.html")
'''

def vulns_details(request):
    return render(request, "vulns_details.html")