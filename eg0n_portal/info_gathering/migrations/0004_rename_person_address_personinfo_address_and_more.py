# Generated by Django 4.2.16 on 2024-12-08 23:35

import datetime
from django.db import migrations, models
import info_gathering.models


class Migration(migrations.Migration):

    dependencies = [
        ('info_gathering', '0003_alter_domainname_create_date_and_more'),
    ]

    operations = [
        migrations.RenameField(
            model_name='personinfo',
            old_name='person_address',
            new_name='address',
        ),
        migrations.RenameField(
            model_name='personinfo',
            old_name='person_coordinates',
            new_name='coordinates',
        ),
        migrations.RenameField(
            model_name='personinfo',
            old_name='person_email',
            new_name='email',
        ),
        migrations.RenameField(
            model_name='personinfo',
            old_name='person_facebook',
            new_name='facebook',
        ),
        migrations.RenameField(
            model_name='personinfo',
            old_name='person_instagram',
            new_name='instagram',
        ),
        migrations.RenameField(
            model_name='personinfo',
            old_name='person_linkedin',
            new_name='linkedin',
        ),
        migrations.RenameField(
            model_name='personinfo',
            old_name='person_mobile',
            new_name='mobile',
        ),
        migrations.RenameField(
            model_name='personinfo',
            old_name='person_name',
            new_name='name',
        ),
        migrations.RenameField(
            model_name='personinfo',
            old_name='person_tiktok',
            new_name='tiktok',
        ),
        migrations.RenameField(
            model_name='personinfo',
            old_name='person_website',
            new_name='website',
        ),
        migrations.AlterField(
            model_name='domainname',
            name='administrative_contact',
            field=models.CharField(db_column='name', max_length=64, verbose_name=info_gathering.models.PersonInfo),
        ),
        migrations.AlterField(
            model_name='domainname',
            name='create_date',
            field=models.DateField(default=datetime.datetime(2024, 12, 8, 23, 35, 3, 659379, tzinfo=datetime.timezone.utc)),
        ),
        migrations.AlterField(
            model_name='domainname',
            name='expire_date',
            field=models.DateField(default=datetime.datetime(2024, 12, 8, 23, 35, 3, 659393, tzinfo=datetime.timezone.utc)),
        ),
        migrations.AlterField(
            model_name='domainname',
            name='update_date',
            field=models.DateField(default=datetime.datetime(2024, 12, 8, 23, 35, 3, 659385, tzinfo=datetime.timezone.utc)),
        ),
    ]