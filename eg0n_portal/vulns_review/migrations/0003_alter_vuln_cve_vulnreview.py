# Generated by Django 4.2.16 on 2024-11-30 16:09

from django.conf import settings
from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    dependencies = [
        migrations.swappable_dependency(settings.AUTH_USER_MODEL),
        ('vulns_review', '0002_remove_vuln_review'),
    ]

    operations = [
        migrations.AlterField(
            model_name='vuln',
            name='cve',
            field=models.CharField(max_length=32, unique=True),
        ),
        migrations.CreateModel(
            name='VulnReview',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('review', models.TextField()),
                ('publish_date', models.DateField(auto_now_add=True)),
                ('update_date', models.DateField(auto_now=True)),
                ('author', models.ForeignKey(blank=True, null=True, on_delete=django.db.models.deletion.SET_NULL, to=settings.AUTH_USER_MODEL)),
                ('cve', models.ForeignKey(db_column='cve', on_delete=django.db.models.deletion.CASCADE, to='vulns_review.vuln', to_field='cve')),
            ],
        ),
    ]
