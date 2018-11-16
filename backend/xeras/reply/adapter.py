from .site2.site2 import get_answer as get_answer_site_2


def get_answer(argument, *arguments, **keywords):
    print('argument:', argument)
    print('arguments:', arguments)
    print('keywords:', keywords)
    site = keywords['site']
    if site == 'site1':
        pass
    elif site == 'site2':
        return get_answer_site_2(argument, *arguments, **keywords)
