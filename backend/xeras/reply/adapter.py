from .site2.site2 import get_answer as get_answer_site_2


def get_answer(question, site):
    if site == 'site1':
        pass
    elif site == 'site2':
        return get_answer_site_2('', question=question)
