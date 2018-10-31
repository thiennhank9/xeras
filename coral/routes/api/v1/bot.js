const express = require('express');
const router = express.Router();
const replyBot = require('../../../services/auto_reply_comment');

/**
 * Get message from NLP backend and reply to user
 */
router.post('/reply', async (req, res, next) => {
  var replyComment = req.body;
  if (!replyComment) {
    res.status(204).end();
    return;
  }

  var responseMessage = await replyBot.sendReplyComment(replyComment);

  // Send back the message object.
  res.json({ message: responseMessage });
});

module.exports = router;
