import xeras.reply.get_type_question as get_type_question
import xeras.reply.site2.answer as answer
from xeras.nlp.text_classification.main import TextClassificationPredict


global tcp
tcp = TextClassificationPredict()
tcp.setup()


def get_answer_by_price_question(argument, *arguments, **keywords):
    question_type = get_type_question.price.type_question(argument, *arguments, **keywords)
    keywords['question_type'] = question_type
    return answer.price.get_answer(argument, *arguments, **keywords)


def get_answer_by_sale_of_question(argument, *arguments, **keywords):
    question_type = get_type_question.sale_off.type_question(argument, *arguments, **keywords)
    print('question_type in a:', question_type)
    keywords['question_type'] = question_type
    return answer.sale_off.get_answer(argument, *arguments, **keywords)


def get_answer_by_hardware_question(argument, *arguments, **keywords):
    question_type = get_type_question.hardware.type_question(argument, *arguments, **keywords)
    keywords['question_type'] = question_type
    return answer.hardware.get_answer(argument, *arguments, **keywords)


def get_answer_by_software_question(argument, *arguments, **keywords):
    question_type = get_type_question.software.type_question(argument, *arguments, **keywords)
    keywords['question_type'] = question_type
    return answer.software.get_answer(argument, *arguments, **keywords)


def get_answer_by_phone_source_question(argument, *arguments, **keywords):
    question_type = get_type_question.phone_source.type_question(argument, *arguments, **keywords)
    keywords['question_type'] = question_type
    return answer.phone_source.get_answer(argument, *arguments, **keywords)


def get_answer_by_phone_feature_question(argument, *arguments, **keywords):
    question_type = get_type_question.feature.type_question(argument, *arguments, **keywords)
    keywords['question_type'] = question_type
    return answer.feature.get_answer(argument, *arguments, **keywords)


def get_answer_by_stocking_question(argument, *arguments, **keywords):
    question_type = get_type_question.stocking.type_question(argument, *arguments, **keywords)
    keywords['question_type'] = question_type
    return answer.stocking.get_answer(argument, *arguments, **keywords)


def get_answer_by_address_question(argument, *arguments, **keywords):
    question_type = get_type_question.address.type_question(argument, *arguments, **keywords)
    keywords['question_type'] = question_type
    return answer.address.get_answer(argument, *arguments, **keywords)


def get_answer_by_store_received_time_question(argument, *arguments, **keywords):
    question_type = get_type_question.received_time.type_question(argument, *arguments, **keywords)
    keywords['question_type'] = question_type
    return answer.received_time.get_answer(argument, *arguments, **keywords)


def get_answer_by_store_installment_question(argument, *arguments, **keywords):
    question_type = get_type_question.installment.type_question(argument, *arguments, **keywords)
    keywords['question_type'] = question_type
    return answer.installment.get_answer(argument, *arguments, **keywords)


def get_answer_by_warranty_question(argument, *arguments, **keywords):
    question_type = get_type_question.warranty.type_question(argument, *arguments, **keywords)
    keywords['question_type'] = question_type
    return answer.warranty.get_answer(argument, *arguments, **keywords)


def get_answer_by_resell_question(argument, *arguments, **keywords):
    question_type = get_type_question.resell.type_question(argument, *arguments, **keywords)
    keywords['question_type'] = question_type
    return answer.resell.get_answer(argument, *arguments, **keywords)


switcher_site2 = {
    'hoi_gia': get_answer_by_price_question,
    'hoi_khuyen_mai': get_answer_by_sale_of_question,
    'hoi_phan_cung': get_answer_by_hardware_question,
    'hoi_phan_mem': get_answer_by_software_question,
    'hoi_nguon_hang': get_answer_by_phone_source_question,
    'hoi_nhu_cau': get_answer_by_phone_feature_question,
    'hoi_con_hang': get_answer_by_stocking_question,
    'hoi_dia_chi': get_answer_by_address_question,
    'hoi_khi_nao': get_answer_by_store_received_time_question,
    'hoi_tra_gop': get_answer_by_store_installment_question,
    'hoi_bao_hanh': get_answer_by_warranty_question,
    'hoi_doi_cu_lay_moi': get_answer_by_resell_question
}


def get_answer(argument, *arguments, **keywords):
    # Get the function from switcher dictionary

    # get question category by cl
    question = keywords['question']
    question_category = tcp.get_predict(question)
    print('question_category:',question_category)

    # add phone_name in keyword, after this will handle by ner
    keywords['phone_name'] = 'iPhone XS Max'

    # print('argument:', argument)
    # print('arguments:', arguments)
    # print('keywords:', keywords)

    func = switcher_site2.get(question_category, "nothing")
    # Execute the function
    return func(argument, *arguments, **keywords)