from django.db import models
from django.contrib.auth.models import User
from datetime import datetime, timezone

# Vulnerabilities Models
class Vuln(models.Model):
    cve = models.CharField(max_length=32, unique=True)
    name = models.CharField(max_length=32, unique=True)
    cvss = models.FloatField(default=0, null=True)
    description = models.TextField()
    publish_date = models.DateField(auto_now=False, auto_now_add=True)
    update_date = models.DateField(auto_now=True, auto_now_add=False)
    slug = models.SlugField()

    def __str__(self):
        return self.cve

class VulnReview(models.Model):
    cve = models.ForeignKey(Vuln, to_field="name", on_delete=models.CASCADE, db_column="name")
    review = models.TextField()
    publish_date = models.DateField(auto_now=False, auto_now_add=True)
    update_date = models.DateField(auto_now=True, auto_now_add=False)
    author = models.ForeignKey(User, on_delete=models.SET_NULL, null=True, blank=True)

    def __str__(self):
        return f"{self.author})"

# IP Address Models
CONFIDENCE_CHOICES = [ ('low', 'low'), ('medium', 'medium'), ('high', 'high') ]
class ipadd(models.Model):
    ip_address = models.GenericIPAddressField(unique=True, unpack_ipv4=True)
    url = models.CharField(max_length=32, blank=True, default='none')
    fqdn = models.CharField(max_length=32, blank=True, default='none')
    confidence = models.CharField(max_length=16, choices=CONFIDENCE_CHOICES, default='low')
    description = models.TextField()
    publish_date = models.DateField(auto_now=False, auto_now_add=True)
    update_date = models.DateField(auto_now=True, auto_now_add=False)
    expire_date = models.DateField(default=datetime.now(timezone.utc))