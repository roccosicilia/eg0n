from django.urls import path, include
from . import views as vulns_views

urlpatterns = [
    path('', vulns_views.home, name="Home"),
    path('vulns', vulns_views.vulns_list, name="Vulns"),
    path('vulns-details', vulns_views.vulns_details, name="Vulns Details"),
]