from django.apps import AppConfig


class Site2Config(AppConfig):
    name = 'xeras.site2'
    verbose_name = "site 2"

    def ready(self):
        print('run in app start one time')