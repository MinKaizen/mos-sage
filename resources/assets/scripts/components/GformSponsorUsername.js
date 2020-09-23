import {unserialize} from 'php-serialize';
const cookies = require('js-cookie');

export default class GformSponsorUsername {
  // Initialize event listeners
  constructor(element) {
    this.testLog(element);
    const uapReferralCookie = unserialize(cookies.get('uap_referral'));

    if (uapReferralCookie) {
      console.log("Affiliate ID: " + uapReferralCookie.affiliate_id);
    } else {
      console.log('Could not find cookie!');
    }
  }

  // Methods
  testLog(element) {
    console.log('GformSponsorUsername.js is loaded!');
  }

  
}