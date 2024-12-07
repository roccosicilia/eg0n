from django.db import models
from django.contrib.auth.models import User
from datetime import datetime, timezone

# Statics
CONFIDENCE_CHOICES = [ ('low', 'low'), ('medium', 'medium'), ('high', 'high') ]

# Create your models here.
class ipadd(models.Model):
    ip_address = models.GenericIPAddressField(unique=True, unpack_ipv4=True)
    url = models.CharField(max_length=32, blank=True, default='none')
    fqdn = models.CharField(max_length=32, blank=True, default='none')
    confidence = models.CharField(max_length=16, choices=CONFIDENCE_CHOICES, default='low')
    description = models.TextField()
    publish_date = models.DateField(auto_now=False, auto_now_add=True)
    update_date = models.DateField(auto_now=True, auto_now_add=False)
    expire_date = models.DateField(default=datetime.now(timezone.utc))
