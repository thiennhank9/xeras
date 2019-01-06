from django.urls import path
from . import views

urlpatterns = [
    path('comment_answer/', views.comment_answer),
]
