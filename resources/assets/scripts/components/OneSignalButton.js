import $script from 'scriptjs';

const appIds = {
  _default: 'f75e91f7-2deb-4300-bbbd-f501d1e254ca',
  localhost: 'f75e91f7-2deb-4300-bbbd-f501d1e254ca',
  'staging-myonlinestartup.temp312.kinsta.cloud': '5afc90b0-812c-41be-a998-8508ba248038',
  'myonlinestartup.com': 'c0237383-712a-454d-a6d9-f1b3ebbba030',
  'mos-sage.local': '79d3ff1e-55ca-4207-a476-0353aa5dd043',
}

const subdomainNames = {
  _default: null,
  'staging-myonlinestartup.temp312.kinsta.cloud': 'staging-mos',
}

export default class OneSignalButton {
  constructor() {
    $script('https://cdn.onesignal.com/sdks/OneSignalSDK.js', 'onesignal')
    $script.ready('onesignal', init)
  }
}

function init() {
  // eslint-disable-next-line no-undef
  window.OneSignal = window.OneSignal || [];
  // eslint-disable-next-line no-undef
  OneSignal.push(function() {
    // eslint-disable-next-line no-undef
    OneSignal.init({
      appId: getAppId(window.location.hostname),
      allowLocalhostAsSecureOrigin: true,
      subdomainName: getSubdomainName(window.location.hostname),
      promptOptions: {
        customlink: {
          enabled: true /* Required to use the Custom Link */,
          style: 'link',
          text: {
            subscribe:
              'Get Push Notifications' /* Prompt's text when not subscribed */,
            unsubscribe:
              'Unsubscribe from Push Notifications' /* Prompt's text when subscribed */,
          },
          unsubscribeEnabled: true /* Controls whether the prompt is visible after subscription */,
        },
      },
    });
  });
}

function getAppId(domain) {
  if ( domain in appIds ) {
    return appIds[domain]
  } else {
    return appIds._default
  }
}

function getSubdomainName(domain) {
  if ( domain in subdomainNames ) {
    return subdomainNames[domain]
  } else {
    return subdomainNames._default
  }
}
