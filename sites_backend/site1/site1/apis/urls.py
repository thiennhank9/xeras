from django.urls import path
from . import views

urlpatterns = [
    path('phone_info/', views.phone_info),
    path('sale_off/', views.sale_off),
    path('phone_store/', views.phone_store),
    path('store/', views.store),
    path('installment/', views.installment),
    path('warranty/', views.warranty),
    path('event_exchange/', views.event_exchange),
]
