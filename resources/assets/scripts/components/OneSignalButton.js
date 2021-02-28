import $script from 'scriptjs';

export default class OneSignalButton {
  constructor() {
    $script('https://cdn.onesignal.com/sdks/OneSignalSDK.js', 'onesignal')
    $script.ready('onesignal', init)
  }
}

function init() {
  window.OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: 'f75e91f7-2deb-4300-bbbd-f501d1e254ca',
      allowLocalhostAsSecureOrigin: true,
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
          unsubscribeEnabled: false /* Controls whether the prompt is visible after subscription */,
        },
      },
    });
  });
}

// function init() {
//   window.OneSignal = window.OneSignal || [];
//   OneSignal.push(function () {
//     OneSignal.init({
//       appId: '5afc90b0-812c-41be-a998-8508ba248038',
//       promptOptions: {
//         customlink: {
//           enabled: true /* Required to use the Custom Link */,
//           style: 'button' /* Has value of 'button' or 'link' */,
//           size: 'medium' /* One of 'small', 'medium', or 'large' */,
//           color: {
//             button:
//               '#E12D30' /* Color of the button background if style = 'button' */,
//             text: '#FFFFFF' /* Color of the prompt's text */,
//           },
//           text: {
//             subscribe:
//               'Subscribe to push notifications' /* Prompt's text when not subscribed */,
//             unsubscribe:
//               'Unsubscribe from push notifications' /* Prompt's text when subscribed */,
//             explanation:
//               'Get updates from all sorts of things that matter to you' /* Optional text appearing before the prompt button */,
//           },
//           unsubscribeEnabled: true /* Controls whether the prompt is visible after subscription */,
//         },
//       },
//     });
//   });
// }
