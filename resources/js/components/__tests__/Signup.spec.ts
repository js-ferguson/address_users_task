import { mount } from '@vue/test-utils'
import { describe, it, expect } from 'vitest'
import Signup from '../../views/Signup.vue'

describe('Signup', () => {
  it('should render', async () => {
    const wrapper = mount(Signup, {
      propsData: { routeName: 'addresses' }
    })

    expect(wrapper.find('#signin-panel').exists()).toBeTruthy()

    expect(wrapper.find('#InputPassword').exists()).toBeTruthy()

    expect(wrapper.find('#InputEmail').exists()).toBeTruthy()

    expect(wrapper.find('button[type="submit"]').exists()).toBeTruthy()
  })

  it('can enter password', async () => {
    const wrapper = mount(Signup, {
      propsData: { routeName: 'addresses' }
    })

    await wrapper.find('#InputPassword').setValue('Nibbelung')
  })
})
