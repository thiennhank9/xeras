from django.urls import path
from . import views

urlpatterns = [
    path('get_reply_comment/', views.get_reply_comment),
]
