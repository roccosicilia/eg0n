# Generated by Django 4.2.16 on 2024-12-09 23:21

import datetime
from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('ioc_management', '0019_alter_ipadd_expire_date'),
    ]

    operations = [
        migrations.AlterField(
            model_name='ipadd',
            name='expire_date',
            field=models.DateField(default=datetime.datetime(2024, 12, 9, 23, 21, 19, 393243, tzinfo=datetime.timezone.utc)),
        ),
    ]
