<div x-data="{ tab: 'action_plan' }">
  <button :class="{ 'active': tab === 'action_plan' }" @click="tab = 'action_plan'">Action plan</button>
  <button :class="{ 'active': tab === 'quiz' }" @click="tab = 'quiz'">Quiz</button>
  <button :class="{ 'active': tab === 'notes' }" @click="tab = 'notes'">Notes</button>

  <div x-show="tab === 'action_plan'">Action Plan Tab</div>
  <div x-show="tab === 'quiz'">Quiz Tab</div>
  <div x-show="tab === 'notes'">Notes Tab</div>
</div>