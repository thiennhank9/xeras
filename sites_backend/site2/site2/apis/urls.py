from django.urls import path
from . import views

urlpatterns = [
    path('test_api/', views.test_api),
]
