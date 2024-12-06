# Generated by Django 4.2.16 on 2024-12-06 22:24

import datetime
from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('ip_rep', '0005_ipadd_expire_date'),
    ]

    operations = [
        migrations.AddField(
            model_name='ipadd',
            name='confidence',
            field=models.CharField(choices=[('low', 'low'), ('medium', 'medium'), ('high', 'high')], default='low', max_length=16),
        ),
        migrations.AlterField(
            model_name='ipadd',
            name='expire_date',
            field=models.DateField(default=datetime.datetime(2024, 12, 6, 22, 24, 54, 127262, tzinfo=datetime.timezone.utc)),
        ),
    ]
