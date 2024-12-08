from django.contrib import admin
from .models import OrganizationInfo, PersonInfo, DomainName

class OrganizationInfoAdmin(admin.ModelAdmin):
    list_display = ["organization_name", "url", "publish_date"]
    list_filter = ["publish_date"]
    search_fields = ["organization_name", "url"]
    class Meta:
        model = OrganizationInfo

class PersonInfoAdmin(admin.ModelAdmin):
    list_display = ["person_name", "person_email", "person_website"]
    list_filter = ["publish_date"]
    search_fields = ["person_name", "person_email"]
    class Meta:
        model = PersonInfo

class DomainNameAdmin(admin.ModelAdmin):
    list_display = ["domain_name", "organization_name", "administrative_contact"]
    list_filter = ["expire_date"]
    search_fields = ["domain_name", "organization_name"]
    class Meta:
        model = DomainName

# Register
admin.site.register(DomainName, DomainNameAdmin)
admin.site.register(OrganizationInfo, OrganizationInfoAdmin)
admin.site.register(PersonInfo, PersonInfoAdmin)
