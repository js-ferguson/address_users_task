import { mount } from '@vue/test-utils'
import { describe, it, expect } from 'vitest'
import Home from '../../views/Home.vue'

describe('Home', () => {
  it('should render', async () => {
    const wrapper = mount(Home, {
      propsData: { routeName: 'addresses' }
    })

    expect(wrapper.find('#signin-panel').exists()).toBeTruthy()

    expect(wrapper.find('#InputPassword').exists()).toBeTruthy()

    expect(wrapper.find('#InputEmail').exists()).toBeTruthy()

    expect(wrapper.find('button[type="submit"]').exists()).toBeTruthy()
  })

  it('can enter password', async () => {
    const wrapper = mount(Home, {
      propsData: { routeName: 'addresses' }
    })

    await wrapper.find('#InputPassword').setValue('Nibbelung')
  })
})
