const axios = require('axios');
const bots = require('./bots_identifi');
const config = require('../../config');
const sampleData = require('./sampleDataTest');

module.exports = {
  getComment: async comment => {
    console.log('comment content: ', comment);
    console.log('NLP Server: ', config.NLP_URL_SERVER);
  },
  sendCommentToNLP: async comment => {
    try {
      await axios.post(config.NLP_URL_SERVER, comment, {
        headers: {
          'Content-Type': 'application/json',
        },
      });
      comment.status = 'send comment successed';
    } catch (error) {
      comment.status = 'send comment failed';
    }
    return comment;
  },
  sendReplyComment: async comment => {
    var createMessageMutation = {
      query:
        'mutation CreateComment($commentInput: CreateCommentInput!) { createComment(input:$commentInput) { comment { id body } } }',
      variables: {
        commentInput: {
          asset_id: comment.asset_id,
          body: comment.content,
          parent_id: comment.id,
        },
      },
      operationName: 'CreateComment',
    };

    try {
      await axios.post(
        'http://127.0.0.1:3000/api/v1/graph/ql',
        createMessageMutation,
        {
          headers: {
            Authorization: `Bearer ${bots[0].bot_jwt_token}`,
            'Content-Type': 'application/json',
          },
        }
      );
      console.log('reply successed');
      comment.status = 'reply comment successed';
    } catch (error) {
      console.log('reply failed');
      comment.status = 'reply comment failed';
    }

    return comment;
  },
  getReplyContent: comment => {
    let replyContent = "Câu hỏi của bạn hiện chưa được hỗ trợ, vui lòng đến các cửa hàng gần nhất để được tư vấn trực tiếp!!!";
    for (let category in sampleData) {
      sampleData[category].Questions.forEach((question, index) => {
        if (question === comment) {
          replyContent = sampleData[category].Answers[index];
        }
      })
    }
    return replyContent;
  }
};
