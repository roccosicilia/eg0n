# Generated by Django 4.2.16 on 2024-12-15 14:25

import datetime
from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('infosec_dashboard', '0001_initial'),
    ]

    operations = [
        migrations.AlterField(
            model_name='asset',
            name='end_of_life',
            field=models.DateField(default=datetime.datetime(2024, 12, 15, 14, 25, 55, 677836, tzinfo=datetime.timezone.utc)),
        ),
    ]
