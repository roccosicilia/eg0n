# Generated by Django 4.2.16 on 2024-11-30 15:20

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('vulns_review', '0001_initial'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='vuln',
            name='review',
        ),
    ]
