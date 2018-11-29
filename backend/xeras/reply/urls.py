from django.urls import path
from . import views

urlpatterns = [
    path('test_api/', views.test_api),
    path('test_ner/', views.test_ner),
]
