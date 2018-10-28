const express = require('express');
const {
  passport,
  HandleGenerateCredentials,
  HandleLogout,
} = require('../../../services/passport');
const authz = require('../../../middleware/authorization');
const router = express.Router();
const jwt = require('jsonwebtoken');
const uuid = require('uuid');

/**
 * This returns the user if they are logged in.
 */
router.get('/', (req, res, next) => {
  if (!req.user) {
    res.status(204).end();
    return;
  }

  res.header('Cache-Control', 'private, no-cache, no-store, must-revalidate');
  res.header('Expires', '-1');
  res.header('Pragma', 'no-cache');

  // Send back the user object.
  res.json({ user: req.user });
});

/**
 * This blacklists the token used to authenticate.
 */
router.delete('/', authz.needed(), HandleLogout);

//==============================================================================
// PASSPORT ROUTES
//==============================================================================

/**
 * Local auth endpoint, will receive a email and password
 */
router.post('/local', (req, res, next) => {
  // Perform the local authentication.
  passport.authenticate(
    'local',
    { session: false },
    HandleGenerateCredentials(req, res, next)
  )(req, res, next);
});

/**
 * Local generate token based user id
 */
router.post('/generateToken', (req, res, next) => {
  // Create a token, sign it with our secret, and send it back to the user.
  try {
    const { jwt_audience, jwt_issuer, secret, id } = req.body;

    if (!jwt_audience || !jwt_issuer || !secret) {
      return next('jwt_audience, jwt_issuer, secret may be null');
    }

    const token = jwt.sign({ sub: id }, secret, {
      jwtid: uuid.v4(),
      audience: jwt_audience,
      issuer: jwt_issuer,
      expiresIn: '365 day',
    });

    res.json({ token });
  } catch (err) {
    return res.status(500);
  }
});

module.exports = router;
