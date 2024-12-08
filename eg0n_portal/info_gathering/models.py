from django.db import models
from django.contrib.auth.models import User
from datetime import datetime, timezone

# Organizations
class OrganizationInfo(models.Model):
    organization_name = models.CharField(max_length=64, unique=True)
    organization_address = models.CharField(max_length=64, blank=True, default='none')
    organization_coordinates = models.CharField(max_length=64, blank=True, default='none')
    url = models.CharField(max_length=64, blank=True, default='none')
    description = models.TextField()
    publish_date = models.DateField(auto_now=False, auto_now_add=True)
    
    def __str__(self):
        return self.organization_name

class PersonInfo(models.Model):
    person_name = models.CharField(max_length=64, unique=True)
    person_address = models.CharField(max_length=64, blank=True, default='none')
    person_coordinates = models.CharField(max_length=64, blank=True, default='none')
    person_email = models.CharField(max_length=64, blank=True, default='none')
    person_mobile = models.CharField(max_length=64, blank=True, default='none')
    person_website = models.CharField(max_length=64, blank=True, default='none')
    person_linkedin = models.CharField(max_length=64, blank=True, default='none')
    person_facebook = models.CharField(max_length=64, blank=True, default='none')
    person_instagram = models.CharField(max_length=64, blank=True, default='none')
    person_tiktok = models.CharField(max_length=64, blank=True, default='none')
    description = models.TextField()
    publish_date = models.DateField(auto_now=False, auto_now_add=True)

    def __str__(self):
        return self.person_name

class DomainName(models.Model):
    domain_name = models.CharField(max_length=64, unique=True)
    organization_name = models.ForeignKey(OrganizationInfo, to_field="organization_name", on_delete=models.CASCADE, db_column="organization_name", default="none", null=True)
    administrative_contact = models.ForeignKey(PersonInfo, to_field="person_name", on_delete=models.CASCADE, db_column="person_name")
    #technical_contact = models.ForeignKey(PersonInfo, to_field="person_name", on_delete=models.CASCADE, db_column="person_name")
    name_server_1 = models.CharField(max_length=64, blank=True, default='none')
    name_server_2 = models.CharField(max_length=64, blank=True, default='none')
    name_server_3 = models.CharField(max_length=64, blank=True, default='none')
    description = models.TextField()
    create_date = models.DateField(default=datetime.now(timezone.utc))
    update_date = models.DateField(default=datetime.now(timezone.utc))
    expire_date = models.DateField(default=datetime.now(timezone.utc))

    def __str__(self):
        return self.domain_name
