let _ = require('lodash');
const autoRelyComment = require('../../services/auto_reply_comment');
let AssetsService = require('../../services/assets');

let site1 = "http://localhost/thiennhan";
let site2 = "http://smartcellphone.drupal";

module.exports = {
    hooks: {
        RootMutation: {
          createComment: {
            post: async (obj, args, {user}, info, comment) => {
                // adapter.excute(obj, args, moduleArgs, info, comment);
                let assert = await AssetsService.findById(comment['comment'].asset_id);
                let assertUrl = assert.url;
                let site = '';
                let response = {};

                console.log("---------- run mobilephone-site plugin ----------");

                const useremail = user['profiles'][0]['id'];
                cloneUser = {...user['_doc'], useremail};

                if (_.includes(assertUrl, site1)) {    
                    site = 'site1';
                } else if (_.includes(assertUrl, site2)) {
                    site = 'site2';
                }

                // remove ";" notation in comment
                comment['comment'].body = comment['comment'].body.replace(";", ".");

                const dataToNLP = {
                    'comment': comment['comment'].body,
                    'site': site,
                    'phone_name': 'iphone xs max',
                    'user': cloneUser
                }

                
                // console.log("response['answer'].data: ", response['answer'].data);
                
                // send reply comment
                if (comment['comment'].author_id != '6e40f4dc-afe2-4895-b095-5b18cc3c6ecf') {
                    response = await autoRelyComment.sendCommentToNLP(dataToNLP);
                    comment['comment'].content = response.answer.data.result_test;
                    await autoRelyComment.sendReplyComment(comment['comment']);
                }

                comment['comment'].content = null;
                
                return comment;
            }
          }
        }
    },
};
