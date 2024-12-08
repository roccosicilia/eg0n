from django.contrib import admin

# Register your models here.
from .models import Vuln, VulnReview, ipadd

# Vulnerabilities: custom admin
class VulnsAdmin(admin.ModelAdmin):
    list_display = ["name", "cve", "cvss", "publish_date"]
    list_filter = ["publish_date"]
    search_fields = ["name", "name"]
    prepopulated_fields = {"slug": ("name",)}
    class Meta:
        model = Vuln

class VulnReviewAdmin(admin.ModelAdmin):
    list_display = ["cve", "publish_date", "author"]
    list_filter = ["publish_date"]
    search_fields = ["cve", "author"]
    class Meta:
        model = VulnReview

# IP Address: custom admin
class IpAdmin(admin.ModelAdmin):
    list_display = ["ip_address", "url", "fqdn", "publish_date", "expire_date"]
    list_filter = ["publish_date"]
    search_fields = ["ip_address", "url"]
    class Meta:
        model = ipadd


# Register
admin.site.register(Vuln, VulnsAdmin)
admin.site.register(VulnReview, VulnReviewAdmin)
admin.site.register(ipadd, IpAdmin)