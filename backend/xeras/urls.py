from django.contrib import admin
from django.urls import path, include

urlpatterns = [
    path('admin/', admin.site.urls),
    # path('reply/', include('site1.urls'))
    path('site2/', include('xeras.site2.urls')),
    path('reply/', include('xeras.reply.urls')),
]
