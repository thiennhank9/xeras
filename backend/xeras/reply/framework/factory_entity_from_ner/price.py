def type_question(mapping_key, **predict_object):
    type_question = predict_object['type_ask']
    if type_question == 'hoi_gia_so_sanh':
        return get_entity_for_compare_price(mapping_key, **predict_object)
    return None
    

def get_entity_for_compare_price(mapping_key, **predict_object):
    entities = predict_object['entities']
    object_entities = {}
    index = 0
    for entity in entities:
        entity_key = entity[0]
        entity_value = entity[1]

        # convert special key from ner to normal key for query database
        if entity_key in mapping_key:
            entity_key = mapping_key[entity_key]
        else:
            # convert key to lower case with underscore convention
            entity_key = entity_key.lower()

        if entity_key == 'ROM':
            if index ==  0:
                object_entities['firstPhone'] = {'ROM': entity_value}
            else:
                object_entities['secondPhone'] = {'ROM': entity_value}
            index = index + 1
        else:
            object_entities[entity_key] = entity_value

    return object_entities