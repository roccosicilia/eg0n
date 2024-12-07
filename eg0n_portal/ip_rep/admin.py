from django.contrib import admin

# Register your models here.
from .models import ipadd

# IP Address: custom admin
class IpAdmin(admin.ModelAdmin):
    list_display = ["ip_address", "url", "fqdn", "publish_date", "expire_date"]
    list_filter = ["publish_date"]
    search_fields = ["ip_address", "url"]
    class Meta:
        model = ipadd

# Vuln: register
admin.site.register(ipadd, IpAdmin)