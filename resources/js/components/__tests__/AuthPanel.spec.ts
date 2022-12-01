import { mount } from '@vue/test-utils'
import { describe, it, expect } from 'vitest'
import AuthPanel from '../AuthPanel.vue'

describe('AuthPanel', () => {
  it('should render', async () => {
    const wrapper = mount(AuthPanel, {
      propsData: { routeName: 'addresses' }
    })

    expect(wrapper.find('#signin-panel').exists()).toBeTruthy()

    expect(wrapper.find('#InputEmail').exists()).toBeTruthy()

    expect(wrapper.find('button[type="submit"]').exists()).toBeTruthy()
  })

  it('should accept input values', async () => {
    const wrapper = mount(AuthPanel, {
      propsData: { routeName: 'addresses' }
    })

    await wrapper.find('#InputEmail').setValue('Gordon@gmail.com')
  })
})
